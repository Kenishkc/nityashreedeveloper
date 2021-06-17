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
                                <th>Address</th>
                                <th>Image</th>
                                <th>Phone No</th>
                                <th>Mobile</th>
                                <th>Email_1</th>
                                <th>Email_2</th>
                                <th>Action</th>
                            </tr>
                       </thead>

                       <tbody>
                       @foreach($contact as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{$contact->address}}</td>
                            <td>
                            <img src="{{asset('images/banner_image')}}/{{$contact->banner_image}}" height="150px;" width="200px;"/>

                            </td>
                         
                            <td>{{$contact->phone_no}}</td>

                           <td>{{$contact->mobile}}</td>
                            <td>{{$contact->email_1}}</td>
                             <td>{{$contact->email_2}}</td>
                           
                            <td>
                                 <div class="btn-group">
                                      <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm mr-1 "  onclick="handeldelete({{$contact->id}})"><i class="fa fa-trash"></i></a>
                                </div> 
                             </td>
                                                  
                        </tr>
    

                       @endforeach
                       
                       </tbody>
                       
                       </table>       
                         <a href="{{route('contact.create')}}" class="btn btn-primary btn-sm">Create Contact</a>
             
                    </div>
               </div> 
            </div>
         </div>
      </div>
   </div>
</section>
<!-- //model  -->

<div id="deletemodal" class="modal fade">
	<div class="modal-dialog modal-confirm">
    <form action="#" method="POST" id="deletebanner">
      @csrf
      @method('DELETE')
      
        <div class="modal-content">
			<div class="modal-header bg-danger ">				
				<h4 class="modal-title w-100">Are you sure?</h4>	
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
    var form = document.getElementById('deletebanner')
    form.action='contact/' +id
    
    $('#deletemodal').modal('show')
}
</script>