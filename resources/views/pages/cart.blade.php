@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
  <link rel="stylesheet" href="{{ asset('/') }}main.css">    
<!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Name &amp; Seller</td>
                    <td>Price</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @foreach ($carts as $cart)
                    <tr>
                      <td style="width: 20%;">
                        @if($cart->product->galleries)
                          <img
                            src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                            alt=""
                            class="cart-image"
                          />
                        @endif
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">{{ $cart->product->name }}</div>
                        <div class="product-subtitle">by {{ $cart->product->user->store_name }}</div>
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">${{ number_format($cart->product->price) }}</div>
                        <div class="product-subtitle">USD</div>
                      </td>
                      <td style="width: 20%;">
                        <form action="{{ route('keranjang.destroy', $cart->id) }}" method="POST">
                          @method('DELETE')
                          @csrf 
                          <button class="btn btn-remove-cart" type="submit">
                            Remove
                          </button>
                        </form>
                      </td>
                    </tr>
                    @php $totalPrice += $cart->product->price @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Address 1</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    name="address_one"
                    value="Setra Duta Cemara"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Address 2</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    name="address_two"
                    value="Blok B2 No. 34"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="provinces_id">Province</label>
                  <select name="provinces_id" id="provinces_id" class="form-control" v-model="provinces_id" v-if="provinces">
                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                  </select>
                  
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="regencies_id">City</label>
                  <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id" v-if="regencies">
                    <option v-for="regency in regencies" :value="regency.id">@{{regency.name }}</option>
                  </select>
                  
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="districts_id">Districts</label>
                  <select name="districts_id" id="districts_id" class="form-control" v-model="districts_id" v-if="districts">
                    <option v-for="district in districts" :value="district.id">@{{district.name }}</option>
                  </select>
                  
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="villages_id">Villages</label>
                  <select name="villages_id" id="villages_id" class="form-control" v-model="villages_id" v-if="villages">
                    <option v-for="village in villages" :value="village.id">@{{village.name }}</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="zip_code">Postal Code</label>
                  <input
                    type="number"
                    class="form-control"
                    id="zip_code"
                    name="zip_code"
                    placeholder="code area number"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="phone_number">Mobile</label>
                  <input
                    type="number"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                    placeholder="phone number"
                  />
                </div>
              </div>
              </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2 class="mb-1">Payment Informations</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Country Tax</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title">$0</div>
                <div class="product-subtitle">Ship to Jakarta</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success">${{ number_format($totalPrice ?? 0) }}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <button
                  type="submit"
                  class="btn btn-success mt-4 px-4 btn-block"
                >
                  Checkout Now
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('/')}}vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          districts: null,
          villages: null,

          provinces_id: null,
          regencies_id: null,
          districts_id: null,
          villages_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
          getDistrictsData() {
            var self = this;
            axios.get('{{ url('api/districts') }}/' + self.regencies_id)
              .then(function (response) {
                  self.districts = response.data;
              })
          },
          getVillagesData() {
            var self = this;
            axios.get('{{ url('api/villages') }}/' + self.districts_id)
              .then(function (response) {
                  self.villages = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
          regencies_id: function (val, oldVal) {
            this.districts_id = null;
            this.getDistrictsData();
          },
          districts_id: function (val, oldVal) {
            this.villages_id = null;
            this.getVillagesData();
          },
        }
      });
    </script>
@endpush