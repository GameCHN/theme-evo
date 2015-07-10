@layout( 'templates.layouts.sidebar' )

@section('page-title')
    {{ the_title() }} test
@endsection

@section('page-content')

    @include('templates.content.category-sidebar')

@endsection


