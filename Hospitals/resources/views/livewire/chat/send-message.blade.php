<div>
 <form wire:submit.prevent="sendMessage">

<div class="main-chat-footer">

 <nav class="nav">
        <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a
            class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i
                class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href=""
            title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i
                class="fas fa-ellipsis-v"></i></a>
    </nav><input wire:model="body" class="form-control" placeholder="Type your message here..." type="text">
    <a class="main-msg-send"
        href="#" wire:click.prevent="sendMessage"><i class="far fa-paper-plane"></i></a>

</div>
    </form>


</div>

{{-- @script
<script>
    $js('onPostSaved', () => {
        alert('Your post has been saved successfully!')
    })
</script>
@endscript --}}
