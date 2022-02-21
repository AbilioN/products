@include ('layouts/app')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Cpf</th>
                <th scope="col">Actions</th>

              </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->cpf}}</td>
                    <td>
                      <form action="{{$client->editUrl()}}">
                        <button type="submit" class="btn btn-outline-warning" style="width:100%;">Edit</button>
                      </form>
                      <form action="{{$client->deleteUrl()}}" method="post">
                        <button type="button" class="btn btn-outline-danger" style="width:100%;">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
           
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>