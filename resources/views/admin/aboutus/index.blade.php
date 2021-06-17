@extends('admin.index')
@section('content')
<section style="padding-top:60px;">
   <div class="container">
      <div class="col-md-12">
         <div class="card p-2">
            <div class="card-body">
      
                       <table class="table table-striped" style="width:100%"  id="datatable">

                       <thead class="thead-dark">
                            <tr>
                                <th>S.no</th>
                                
                                <th>Name</th>
                                <th>Image</th>
                                <th>Position</th>
                                <th>Facebook Link</th>
                                <th>Twitter Link</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($about as $aboutus)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$aboutus->name}}</td>
                            <td>
                                <img src="{{asset('images/member')}}/{{$aboutus->image}}" height="100px;" width="100px;"/>

                            </td>
                         
                            <td>{{$aboutus->position}}</td>
                            <td>{{$aboutus->facebook_link}}</td>
                            <td>{{$aboutus->twitter_link}}</td>     
                            <td>
                                 <div class="btn-group">
                                     <a href="{{route('aboutus.edit',$aboutus->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm mr-1 "  onclick="handeldelete({{$aboutus->id}})"><i class="fa fa-trash"></i></a>
                                </div> 
                             </td>
                                                  
                        </tr>
    

                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                         <a href="{{route('aboutus.create')}}" class="btn btn-primary btn-sm">Create Members</a>
             
                    </div>
               </div> 
            </div>
         </div>
      </div>
   </div>
</section>


<!-- Mymodel for delete -->
<div id="deletemodal" class="modal fade">
	<div class="modal-dialog modal-confirm">
    <form action="#" method="POST" id="deleteabout">
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

    var form = document.getElementById('deleteabout')
    form.action='aboutus/' +id
    
    $('#deletemodal').modal('show')

}

</script>
