<div>
    @foreach ($comment_all as $comment)
        <livewire:comments.component.card :comment="$comment"/>
    @endforeach
</div>
