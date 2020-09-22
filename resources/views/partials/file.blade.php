<span class="">
    {{$label}}
</span>

<div class="flex items-center bg-body rounded-md border-2 border-gray-400 @error('attachment') border-red-500 @enderror">
    <label for="file" class="file-label p-2 bg-body">
        {{$buttonLabel}}
    </label>
    <span id="chosenFile" class="text-gray-500">
         {{$emptyStateText}}
    </span>
</div>
<input type="file" name="attachment" id="file" style="display: none;" accept=".docx,application/msword, .pdf, application/pdf">
@error('attachment')
    <span class="text-red-400">{{$message}}</span>
@enderror
