@include("components.layouts.app")
@section("contenus")
@livewire('post-interactions', ['post' => $post])
@include("entete.footer")

@endsection
