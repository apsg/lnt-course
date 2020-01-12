<a href="{{ url('/course/'.$course->id) }}" class="btn btn-green">
    <i class="fa fa-eye"></i> Zobacz
</a>

@if(!$course->isPublished())
    <a href="" class="btn btn-primary">
        <i class="fa fa-check"></i> Opublikuj
    </a>
@endif
