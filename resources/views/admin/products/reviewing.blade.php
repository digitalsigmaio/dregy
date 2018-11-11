@extends('admin.app')

@section('content')

<style>
  #adjust_row{
    margin-left:3%;
  }

  .red{
    color: red;
  }

  .blue {
    color: blue
  }
</style>

<div class="container">    
    <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
            <div class="card-header mb-5 mt-5">
              <h2>Product Details</h2>
            </div>
            <div class="card-body">
              <table class="table table-hover user-table">
                
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <th>Title</th>
                    <td>{{$productAd->title}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>{{$productAd->description}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Stauts</th>
                    <td>{{$productAd->status}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{$productAd->address}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Region</th>
                    <td>{{$productAd->region->en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>City</th>
                    <td>{{$productAd->city->en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Expires at</th>
                    <td>{{date( "M d, Y", (time() + 30 * 24 * 60 *60) ) }}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td>{{$productAd->category->en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <td>{{$productAd->price}} EGP</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <ul class="m-auto">
                <!-- HOLD ON USAGE
                <li><a :href="edit_url">Edit</a></li>
                -->
                <div id="adjust_row" class="row p-0 ml-4">
                    <form action="/admin/review/product/{{ $productAd->id }}" method="post">
                        @csrf
                        <div class="col-md">
                            <div class="md-form">
                            <i class="fa fa-pencil prefix"></i>
                            <label for="form10">Declined Reason</label>
                            <textarea type="text" id="form10" class="md-textarea form-control" name="reason" placeholder="Reason if declined" rows="3"></textarea>
                            </div>
                        </div>
                        <!-- Group of default radios - option 1 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" value=1 name="status" checked>
                            <label class="custom-control-label blue" for="defaultGroupExample1">Approved</label>
                        </div>

                        <!-- Group of default radios - option 2 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample2" value=0 name="status">
                            <label class="custom-control-label red" for="defaultGroupExample2">Declined</label>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-info danger btn-block my-2 mt-5" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
              </ul>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection