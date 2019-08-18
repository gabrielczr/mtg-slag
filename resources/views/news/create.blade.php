<div class="create">
  @extends('layouts.app')

  @section('content')
  <H2>Add News</h2>
  @yield('create')





  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create Announcement</div>
          <div class="card-body">
            <form method="post" action="{{ route('post.store') }}">
              <div class="form-group">
                @csrf
                <label class="label">Post Title: </label>
                <input type="text" name="title" class="form-control" required />
              </div>
              <div class="form-group">
                <label class="label">Slug : </label>
                <input type="text" name="slug" class="form-control"><br></div>

              <div class="form-group">
                <label class="label">Summary: </label>
                <textarea name="summary" rows="3" cols="30" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label class="label">Post Body: </label>
                <textarea name="content" rows="10" cols="30" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

</div>