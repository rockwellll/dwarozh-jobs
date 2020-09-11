<template>
    <div>
        <button type="button" @click="show"
                class="text-sm bg-transparent text-accent hover:text-gray-700 focus:outline-none">
            {{__("auth.why_you_want_my_cv")}}
        </button>

        <p v-if="v" class="text-sm">
            {{__("auth.why_we_want_your_cv")}}
        </p>
    </div>
</template>

<script>
    export default {
        name: "about-resume-modal",
        data: () => ({
            v: false,
        }),
        methods: {
            show() {
                this.v = !this.v;
            }
        }
    }
</script>
