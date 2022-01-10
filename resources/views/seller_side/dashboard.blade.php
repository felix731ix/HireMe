<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_seller.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile/profile.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('bootstrap')
    <title>Dashboard - Seller</title>
</head>
<body>
@include('layout.navbar_seller')
<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#" style="color: #43D06B; font-size:12px;">Seller</a></li>
              <li class="breadcrumb-item active" style="font-size: 12px" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{Storage::url(auth()->user()->profile_picture)}}" class="rounded-circle" width="50">
                            <h4 style="padding: 10px 0px 0px 10px">{{auth()->user()->name}}</h4>
                        </div>
                        <div class="d-flex rating" style="padding: 10px 0px 0px 10px">
                            <span class="fa fa-star checked" style="padding: 2px 5px 0px 0px"></span>
                            <h6>4.9</h4>
                        </div>
                    </div>

                    <div class="mt-3">
                      <hr>
                      <small>Chat Response Rate</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">89%</div>
                      </div>
                      <small>Order Response Rate</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 96%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">96%</div>
                      </div>
                      <small>Order Completion</small>
                      <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100">100%</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="1 mt-3" style="font-size: 12px">
                        Earnings
                    </div>
                    <div class="2 mt-2" style="font-weight: bold; font-size:22px">
                        Rp 120.000
                    </div>
                    <div class="3 mt-2 mb-4">
                        <button type="submit" class="withdraw-earnings">
                            Withdraw
                        </button>
                    </div>
                  </div>

              </div>
            </div>
            <div class="col-md-8">
                <div class="user-menu">
                    <nav class="navbar-custom">
                        <div class="d-flex">
                            <span class="nav-item-custom nav-link" href="#">Transaction History</span>
                        </div>
                    </nav>
                    <table class="table" style="margin-top: 24px; font-size: 1.4rem">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        {{-- @for($i=0;$i<count($listTransaction);$i++)
                            @php
                                $totalPayment = 0;
                            @endphp
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$listTransaction[$i]->created_at}}</td>
                                <td>
                                    @php
                                        for($j=0;$j<count($listTransaction[$i]->transactionDetails);$j++){
                                            $quantity = $listTransaction[$i]->transactionDetails[$j]->quantity;
                                             $productPrice = $listTransaction[$i]->transactionDetails[$j]->products->price;
                                             $totalPayment = $quantity * $productPrice;
                                        }
                                    @endphp
                                        @currency($totalPayment)
                                </td>
                                <td>
                                    <form action="/export" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$listTransaction[$i]->id}}">
                                        <button type="submit" style="border: transparent; outline: none; background-color: transparent; cursor: pointer">
                                            <span style="font-size: 24px; background-color: var(--primary_green); color: white; padding: 3px; border-radius: 100px" class="iconify" data-icon="carbon:document-download"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endfor --}}
                        </tbody>
                    </table>
                </div>

              {{-- <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Kenneth Valdez
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (320) 380-4539
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}



            </div>
          </div>

        </div>
    </div>
</body>
</html>
