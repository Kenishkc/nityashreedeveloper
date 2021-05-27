@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header text-center text-white text-bold bg-secondary"><h1>SiteIdentity List</h1>
               </div>
            
     
                       <table class="table table-striped">
                       
                       <thead class="thead-dark">
                            <tr>
                                <th>S.no</th>
                                
                                <th>Site Name</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($site as $s)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$s->site_name}}</td>
                            
                            <td> <img src="{{asset('logo')}}/{{$s->logo}}" width="100px;" height="100px;" alt="image"></td>
                            <td>
                            <div class="btn-group">
                           
                            <a href="{{route('siteidentity.edit',$s->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm mr-1 " onclick="handeldelete({{$s->id}})"><i class="fa fa-trash"></i></a>
                            </div>
                            </td>
                            </tr>


                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                    </div>
                 <a href="{{route('siteidentity.create')}}" class="btn btn-success btn-sm">Create New SiteIdentity</a>
                    
             </div>
        </div>
    </div>
</div>
</section> 
<!-- Mymodel for delete -->
<div id="deletemodal" class="modal fade">
	<div class="modal-dialog modal-confirm">
    <form action="#" method="POST" id="deletesiteidentity">
      @csrf
      @method('DELETE')
      
        <div class="modal-content">
			<div class="modal-header bg-danger ">				
				<h4 class="modal-title text-white w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	
    
    </form>
    </div>
</div>  
@endsection
<script>
function handeldelete(id){

    var form = document.getElementById('deletesiteidentity')
    form.action='siteidentity/' +id
    
    $('#deletemodal').modal('show')

}

</script>
