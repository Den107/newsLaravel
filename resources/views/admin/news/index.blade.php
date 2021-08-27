@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News</h1>
        <a href="{{route('admin.news.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Add New</a>
    </div>

    <!-- Content Row -->
    <div class="row">
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Date added</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newsList as $news)
<tr>
    <td>{{$news->title}}</td>
    <td>{{$news->author}}</td>
    <td>{{$news->status}}</td>
    <td>{{now()->format('d-m-Y H:i')}}</td>
    <td>
        <a href="{{route('admin.news.edit',
        [
            'news'=>$news->id
            ])}}" style="font-size: 12px">Edit</a>&nbsp;
        <a href="javascript:;" rel="{{$news->id}}" class="delete" style="font-size: 12px; color: red">Delete</a>
    </td>
</tr>
            @empty
<tr>
    <td colspan="4">News are not found!!!</td>
</tr>
            @endforelse
        </tbody>
    </table>
</div>

    </div>
@endsection

@push('js')
<script type="text/javascript">
$(function(){
     $('.delete').on('click', function () {
         var id =$(this).attr('rel');
        if(confirm('Confirm delete this news?')){
$.ajax({
    headers:{
        'X-CSRF-TOKEN':$('meta[name='csrf-token']').attr('content')
    },
    type:'DELETE',
    url: '/admin/news/'+id,
    dataType: 'json',
    success: function (response) {
alert('News was been deleted');
location.reload();
    }
})
}
    })

});
</script>
@endpush
