@include ('layouts.app')
<div class="container">
    <div class="row">   
            <form action="{{route('clients.create')}}" method="POST">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="cpf">Cpf</label>
                  <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="emailHelp" placeholder="Enter cpf">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
    </div>
</div>
@section('scripts')
<script>
  cpf.addEventListener("blur", function(){
   if(cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
});
</script>
@endsection