<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Concerns
 * @mixin Model
 * @property array $readers
 * @property array $writers
 * @property array $fillableWriters
 * @property array $accessors
 * @property array $fillableAccessors
 */
trait DelegateProperties
{
    public function setReaders(array $value)
    {
        $this->readers = $value;
    }

    public function setWriters(array $value)
    {
        $this->writers = $value;
    }

    public function setFillableWriters(array $value)
    {
        $this->fillableWriters = $value;
    }

    public function setAccessors(array $value)
    {
        $this->accessors = $value;
    }

    public function setFillableAccessors(array $value)
    {
        $this->fillableAccessors = $value;
    }

    public function getReaders()
    {
        return $this->readers ?? [];
    }

    public function getAllReaders()
    {
        return array_merge(
            $this->getAccessors(),
            $this->getFillableAccessors(),
            $this->getReaders()
        );
    }

    public function getWriters()
    {
        return $this->writers ?? [];
    }

    public function getAllWriters()
    {
        return array_merge(
            $this->getAccessors(),
            $this->getFillableAccessors(),
            $this->getWriters(),
            $this->getFillableWriters()
        );
    }

    public function getFillableWriters() {
        return $this->fillableWriters ?? [];
    }

    public function getAccessors()
    {
        return $this->accessors ?? [];
    }

    public function getFillableAccessors()
    {
        return $this->fillableAccessors ?? [];
    }

    public function __get($key)
    {
        return $this->getProperty($key);
    }

    public function __set($key, $value)
    {
        return $this->setProperty($key, $value);
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fill(array $attributes)
    {
        $totallyGuarded = $this->totallyGuarded();

        foreach ($this->fillableFromArray($attributes) as $key => $value) {
            $key = $this->removeTableFromKey($key);

            // The developers may choose to place some attributes in the "fillable" array
            // which means only those attributes may be set through mass assignment to
            // the model, and all others will just get ignored for security reasons.
            if ($this->isFillable($key) && $this->isMutable($key)) {
                $this->setProperty($key, $value);
            } else if ($this->isFillable($key)) {
                $this->setAttribute($key, $value);
            } elseif ($totallyGuarded) {
                throw new MassAssignmentException(sprintf(
                    'Add [%s] to fillable property to allow mass assignment on [%s].',
                    $key, get_class($this)
                ));
            }
        }

        return $this;
    }

    private static function hasValidGetFromParent()
    {
        if (empty(class_parents(static::class))) {
            return false;
        }

        if (!method_exists(parent::class, '__get')) {
            return false;
        }

        return true;
    }

    private static function hasValidSetFromParent()
    {
        if (empty(class_parents(static::class))) {
            return false;
        }

        if (!method_exists(parent::class, '__set')) {
            return false;
        }

        return true;
    }

    private function makePathCollection($propertyPath)
    {
        return collect([$propertyPath])
            ->flatten()
            ->flatMap(function ($path) {
                return explode('->', $path);
            })
            ->filter();
    }

    private function getProperty($key)
    {
        if ($this->isAccessible($key)) {
            $propertyPath = $this->getReader($key);

            // the pair could be 'email' => 'user->email' OR 'email' => ['user', 'email'] OR both!
            return $this->makePathCollection($propertyPath)
                ->reduce(function ($obj, $prop) {
                    if ($obj === null) return null;
                    return $obj->{$prop};
                }, $this);

        } elseif (self::hasValidGetFromParent()) {
            return parent::__get($key);
        }
    }

    private function isAccessible($key)
    {
        return isset($this->getAllReaders()[$key]);
    }

    private function getReader($key)
    {
        return $this->getAllReaders()[$key];
    }

    private function setProperty($key, $value) {
        if ($this->isMutable($key)) {
            [$propertyPath, $fillable] = $this->getWriter($key);

            // the pair could be 'email' => 'user->email' OR 'email' => ['user', 'email'] OR both!
            $path = $this->makePathCollection($propertyPath);

            $lastKey = $path->pop();

            $lastObject = $path
                ->reduce(function ($obj, $prop) {
                    if ($obj === null) return null;
                    return $obj->{$prop};
                }, $this);

            if ($lastObject === null) {
                return null;
            }
            if ($fillable && method_exists($lastObject, 'fill')) {
                return $lastObject->fill([$lastKey => $value]);
            }
            return $lastObject->{$lastKey} = $value;
        } elseif (self::hasValidSetFromParent()) {
            return parent::__set($key, $value);
        }
    }

    private function isMutable($key)
    {
        return isset($this->getAllWriters()[$key]);
    }

    private function getWriter($key)
    {
        $fillable = isset($this->getFillableWriters()[$key]) || isset($this->getFillableAccessors()[$key]) || isset($this->getAccessors()[$key]);
        $path = $this->getAllWriters()[$key];

        return [$path, $fillable];
    }
}
