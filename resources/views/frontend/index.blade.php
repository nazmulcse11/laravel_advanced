@extends('frontend.layout.app')

@section('title','Web Journey | Courses')

@section('content')
      <!-- content section -->
    <section class="pt-5 course-a" id="course_a">
      <div class="container">

      <!-- Course A -->
        <div class="row text-center">
          <div class="col-sm-12">
            <h4>Course A</h4>
            <h5>Course Fee: 999 BDT</h5>
            <h5>Duration: 15 hr (5 days)</h5>
            <p>Laravel Basic knowledge - Have a PC - Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fas fa-envelope"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Email</h5>
              <p class="card-text"> Send Email To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fas fa-phone"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">SMS</h5>
              <p class="card-text">Send SMS To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-bell"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Notification</h5>
              <p class="card-text">Send Notification To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-facebook-f"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Social Login</h5>
              <p class="card-text">Facebook Github Twitter Google</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-tasks"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Corn Job</h5>
              <p class="card-text">Task Scheduling && Corn Job</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-users"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Multi Authentication</h5>
              <p class="card-text">Project Setup Mastering Authentication</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

      </div>
    </section>

    
    <section class="pt-5 course-b" id="course_b">
      <div class="container">

      <!-- Course B -->
        <div class="row text-center mt-5">
          <div class="col-sm-12">
            <h4>Course B</h4>
            <h5>Course Fee: 14999 BDT</h5>
            <h5>Duration: 4 months(180 hr)</h5>
            <p>PHP - JavasSript Basic - Have a PC - Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fab fa-laravel"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Laravel</h5>
              <p class="card-text">Laravel From Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fab fa-android"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Rest-Restful API</h5>
              <p class="card-text">Create Laravel Restful API</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-shopping-cart"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Laravel Ecommerce</h5>
              <p class="card-text">Advanced Ecommerce Website with laravel-js-jquery-ajax</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <div class="card-body">

              <div class="text-start">
                <h5 class="card-title">Ecommerce Website Backend</h5>
                <hr>

                <h6 class="mt-3">1. Section Module</h6>
                <li>Section (add/edit/delete/view)</li>
                <li>Add unlimited section like Men, Women, Kids etc.</li>
                <li>Update section status active/inactive</li>
                <hr>

                <h6 class="mt-3">2. Brand Module</h6>
                <li>Brand(add/edit/delete/view)</li>
                <li>Add unlimited brands like lee, easy, agsc etc.</li>
                <li>Update brand status active/inactive</li>
                <hr>

                <h6 class="mt-3">3. Category Module</h6>
                <li>Category(add/edit/delete/view)</li>
                <li>Add sub categories under category (main category or others)</li>
                <li>Update category status active/inactive </li>
                <hr>

                <h6 class="mt-3">4. Products Module</h6>
                <li>Products upload with seo requirements(add/edit/delete/view)</li>
                <li>Products Under Section/Brand/Category/Subcategory</li>
                <li>Products attributes like product size, sku, price, stock (under each product)</li>
                <li>Products Multiple Image upload system</li>
                <li>Upload Product videos</li>
                <li>Upload product images in different size and location(small/medium/large)</li>
                <hr>

                <h6 class="mt-3">5. Banner Module</h6>
                <li>Banner/Slider(add/edit/delete/view)</li>
                <hr>

                <h6 class="mt-3">6. Coupons Module</h6>
                <li>Automatic coupon</li>
                <li>Manual coupon</li>
                <li>Coupon for single times</li>
                <li>Coupon for multiple times</li>
                <li>Coupon amount option (Percentage/ Fixed)</li>
                <li>Coupon for specific category or all categories</li>
                <li>Coupon for specific users or all users</li>
                <li>Coupon Expiry Date</li>
                <hr>

                <h6 class="mt-3">7. Orders Module</h6>
                <li>Display all orders</li>
                <li>View Order details like order details, delivery address, billing address etc</li>
                <li>Update Order status like pending/new/process/shipped/delivered etc</li>
                <li>View order status history</li>
                <li>Add courier name and tracking number for order</li>
                <li>Send email and sms to the customer when admin update order status</li>
                <li>Create order invoice</li>
              </div>

            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              
              <div class="text-start">
                <h5 class="card-title">Ecommerce Website Frontend</h5>
                <hr>

                <h6 class="mt-3">1. Home Page/ Shop Page</h6>
                <li>Slider Ads/ Banner</li>
                <li>Show thousands of products with image (less than 3s)</li>
                <hr>

                <h6 class="mt-3">2. Header</h6>
                <li>Show unlimited section category and sub category</li>
                <li>Total items in your cart</li>
                <li>User total orders</li>
                <li>Welcome User</li>
                <hr>

                <h6 class="mt-3">3. Category Page</h6>
                <li>Show products for selected category or sub categories</li>
                <li>Short products by (highest price, lowest price, latest product, products A-Z, Products Z-A)</li>
                <li>Search by (checkbox lots of feature)</li>
                <li>Show available products number </li>
                <hr>

                <h6 class="mt-3">4. Product Detail Page</h6>
                <li>Show product main image and other images (unlimited)</li>
                <li>Image zooming/sliding system</li>
                <li>Availability in stock</li>
                <li>Price change according to selected size (small, medium, large etc)</li>
                <li>Product details</li>
                <li>Add product review</li>
                <hr>

                <h6 class="mt-3">5. Cart Page</h6>
                <li>Show cart items</li>
                <li>Increment Deecrement product quantity with unit price and total price</li>
                <li>Delete product from cart</li>
                <li>Apply coupon code</li>
                <li>Show sub total</li>
                <li>show coupon discount</li>
                <li>show grand total</li>
                <hr>

                <h6 class="mt-3">6. Checkout Page</h6>
                <li>Check cart items</li>
                <li>Add/Edit/Delete Multiple delivery address</li>
                <li>Choose delivery address</li>
                <li>Choose payment method</li>
                <li>Place Order</li>
                <li>Send email for order details and confirmation after place order</li>
                <li>Send sms to mobile number after place order</li>
                <hr>

                <h6 class="mt-3">7. Thanks Page</h6>
                <li>Order completed message</li>
                <li>Order number and total price</li>
                <hr>

                <h6 class="mt-3">8. Order and Order Details Page</h6>
                <li>Customer can view his all order with details like(order details, delivery address, product details)</li>
                <hr>

                <h6 class="mt-3">9. My Account Page</h6>
                <li>User can update his account info and password</li>
                <li>user can reset his password</li>
                <hr>

                <h6 class="mt-3">10. Login Register Page</h6>
                <li>Login system (with facebook and gmail)</li>
                <li>Login system</li>
                <li>After register user will get an email to active his account</li>

              </div>
                
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Package-API-Library</h5>
              <hr>
              <p class="card-text">Laravel Image Intervention</p>
              <hr>
              <p class="card-text">Laravel SMS API</p>
              <hr>
              <p class="card-text">Laravel Sweet Alert2</p>
              <hr>
              <p class="card-text">Laravel Toastr Js</p>
              <hr>
              <p class="card-text">Js Form Validation Library</p>
              <hr>
              <p class="card-text">Data Tables</p>
              <hr>
              <p class="card-text">Laravel Socialite</p>
              <hr>
              <p class="card-text">Laravel dompdf</p>
              <hr>
              <p class="card-text">Laravel recaptcha</p>
              <hr>
              <p class="card-text">Laravel Facebook Login API</p>
              <hr>
              <p class="card-text">Laravel Google Login API</p>
              <hr>
              <p class="card-text">Laravel Github Login API</p>
              <hr>
              <p class="card-text">Payment Getway SSL Commerce</p>
              <hr>
              <p class="card-text">Payment Getway Paypal</p>
              <hr>
              <p class="card-text">Payment Getway Stripe</p>
              <hr>
              <p class="card-text">Laravel Corn Job</p>
              <hr>
              <p class="card-text">Exzoom</p>
              <hr>
              <p class="card-text">Faker PHP Library</p>
              <hr>
              <p class="card-text">Laravel Yajra Datatables</p>
              <hr>
              <p class="card-text">Laravel XL</p>
              <hr>
              <p class="card-text">Laravel Mail</p>
              <hr>
               

            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>
      
      </div>
    </section>  


    <section class="pt-5 course-c" id="course_c">
      <div class="container">

        <!-- Course C -->
        <div class="row text-center mt-5">
          <div class="col-sm-12">
            <h4>Course C</h4>
            <h5>Course Fee: 19999 BDT</h5>
            <h5>Duration: 4 months(200 hr)</h5>
            <p>PHP - JavasSript Basic - Have a PC - Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fab fa-laravel"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Laravel && Rest API</h5>
              <p class="card-text">Laravel From Scratch and Create Laravel rest API</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fab fa-vuejs"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Vue JS 3</h5>
              <p class="card-text">Vue Js 3 From Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-shopping-cart"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Laravel Ecommerce</h5>
              <p class="card-text">Advanced Ecommerce Website with Laravel and Vue js</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <div class="card-body">

              <div class="text-start">
                <h5 class="card-title">Ecommerce Website Backend</h5>
                <hr>

                <h6 class="mt-3">1. Section Module</h6>
                <li>Section (add/edit/delete/view)</li>
                <li>Add unlimited section like Men, Women, Kids etc.</li>
                <li>Update section status active/inactive</li>
                <hr>

                <h6 class="mt-3">2. Brand Module</h6>
                <li>Brand(add/edit/delete/view)</li>
                <li>Add unlimited brands like lee, easy, agsc etc.</li>
                <li>Update brand status active/inactive</li>
                <hr>

                <h6 class="mt-3">3. Category Module</h6>
                <li>Category(add/edit/delete/view)</li>
                <li>Add sub categories under category (main category or others)</li>
                <li>Update category status active/inactive </li>
                <hr>

                <h6 class="mt-3">4. Products Module</h6>
                <li>Products upload with seo requirements(add/edit/delete/view)</li>
                <li>Products Under Section/Brand/Category/Subcategory</li>
                <li>Products attributes like product size, sku, price, stock (under each product)</li>
                <li>Products Multiple Image upload system</li>
                <li>Upload Product videos</li>
                <li>Upload product images in different size and location(small/medium/large)</li>
                <hr>

                <h6 class="mt-3">5. Banner Module</h6>
                <li>Banner/Slider(add/edit/delete/view)</li>
                <hr>

                <h6 class="mt-3">6. Coupons Module</h6>
                <li>Automatic coupon</li>
                <li>Manual coupon</li>
                <li>Coupon for single times</li>
                <li>Coupon for multiple times</li>
                <li>Coupon amount option (Percentage/ Fixed)</li>
                <li>Coupon for specific category or all categories</li>
                <li>Coupon for specific users or all users</li>
                <li>Coupon Expiry Date</li>
                <hr>

                <h6 class="mt-3">7. Orders Module</h6>
                <li>Display all orders</li>
                <li>View Order details like order details, delivery address, billing address etc</li>
                <li>Update Order status like pending/new/process/shipped/delivered etc</li>
                <li>View order status history</li>
                <li>Add courier name and tracking number for order</li>
                <li>Send email and sms to the customer when admin update order status</li>
                <li>Create order invoice</li>
              </div>

            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              
              <div class="text-start">
                <h5 class="card-title">Ecommerce Website Frontend</h5>
                <hr>

                <h6 class="mt-3">1. Home Page/ Shop Page</h6>
                <li>Slider Ads/ Banner</li>
                <li>Show thousands of products with image (less than 3s)</li>
                <hr>

                <h6 class="mt-3">2. Header</h6>
                <li>Show unlimited section category and sub category</li>
                <li>Total items in your cart</li>
                <li>User total orders</li>
                <li>Welcome User</li>
                <hr>

                <h6 class="mt-3">3. Category Page</h6>
                <li>Show products for selected category or sub categories</li>
                <li>Short products by (highest price, lowest price, latest product, products A-Z, Products Z-A)</li>
                <li>Search by (checkbox lots of feature)</li>
                <li>Show available products number </li>
                <hr>

                <h6 class="mt-3">4. Product Detail Page</h6>
                <li>Show product main image and other images (unlimited)</li>
                <li>Image zooming/sliding system</li>
                <li>Availability in stock</li>
                <li>Price change according to selected size (small, medium, large etc)</li>
                <li>Product details</li>
                <li>Add product review</li>
                <hr>

                <h6 class="mt-3">5. Cart Page</h6>
                <li>Show cart items</li>
                <li>Increment Deecrement product quantity with unit price and total price</li>
                <li>Delete product from cart</li>
                <li>Apply coupon code</li>
                <li>Show sub total</li>
                <li>show coupon discount</li>
                <li>show grand total</li>
                <hr>

                <h6 class="mt-3">6. Checkout Page</h6>
                <li>Check cart items</li>
                <li>Add/Edit/Delete Multiple delivery address</li>
                <li>Choose delivery address</li>
                <li>Choose payment method</li>
                <li>Place Order</li>
                <li>Send email for order details and confirmation after place order</li>
                <li>Send sms to mobile number after place order</li>
                <hr>

                <h6 class="mt-3">7. Thanks Page</h6>
                <li>Order completed message</li>
                <li>Order number and total price</li>
                <hr>

                <h6 class="mt-3">8. Order and Order Details Page</h6>
                <li>Customer can view his all order with details like(order details, delivery address, product details)</li>
                <hr>

                <h6 class="mt-3">9. My Account Page</h6>
                <li>User can update his account info and password</li>
                <li>user can reset his password</li>
                <hr>

                <h6 class="mt-3">10. Login Register Page</h6>
                <li>Login system (with facebook and gmail)</li>
                <li>Login system</li>
                <li>After register user will get an email to active his account</li>

              </div>
                
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Package-API-Library</h5>
              <hr>
              <p class="card-text">Laravel Image Intervention</p>
              <hr>
              <p class="card-text">Laravel SMS API</p>
              <hr>
              <p class="card-text">Laravel Sweet Alert2</p>
              <hr>
              <p class="card-text">Laravel Toastr Js</p>
              <hr>
              <p class="card-text">Js Form Validation Library</p>
              <hr>
              <p class="card-text">Data Tables</p>
              <hr>
              <p class="card-text">Laravel Socialite</p>
              <hr>
              <p class="card-text">Laravel dompdf</p>
              <hr>
              <p class="card-text">Laravel recaptcha</p>
              <hr>
              <p class="card-text">Laravel Facebook Login API</p>
              <hr>
              <p class="card-text">Laravel Google Login API</p>
              <hr>
              <p class="card-text">Laravel Github Login API</p>
              <hr>
              <p class="card-text">Payment Getway SSL Commerce</p>
              <hr>
              <p class="card-text">Payment Getway Paypal</p>
              <hr>
              <p class="card-text">Payment Getway Stripe</p>
              <hr>
              <p class="card-text">Laravel Corn Job</p>
              <hr>
              <p class="card-text">Exzoom</p>
              <hr>
              <p class="card-text">Faker PHP Library</p>
              <hr>
              <p class="card-text">Laravel Yajra Datatables</p>
              <hr>
              <p class="card-text">Laravel XL</p>
              <hr>
              <p class="card-text">Laravel Mail</p>
              <hr>
               

            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

      </div>
    </section> 


    <section class="pt-5 course-d" id="course_d">
      <div class="container"> 

        <!-- Course D -->
        <div class="row text-center mt-5">
          <div class="col-sm-12">
            <h4>Course D </h4>
            <p>Have a PC and Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fab fa-html5"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">HTML</h5>
              <p class="card-text"> HTML From Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fab fa-css3-alt"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">CSS</h5>
              <p class="card-text">CSS From Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fab fa-js"></i></h2>
            <div class="card-body">
              <h5 class="card-title">JavaScript</h5>
              <p class="card-text">Javascript and jquery From Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-bootstrap"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Bootstrap</h5>
              <p class="card-text">BootstrapFrom Scratch</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-code"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Library</h5>
              <p class="card-text">JS and Jquery Library</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-cart-plus"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Theme Design</h5>
              <p class="card-text">Ecommerce and Blog Theme Design</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

      </div>
    </section>   


    <section class="pt-5 enroll" id="enroll">
      <div class="container"> 

        <!-- //enroll -->
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <div class="card my-5">

              <div class="card-header">
                <h4>Enroll Now! &nbsp;&nbsp;We Will Contact You ):</h4>
                <small> Call Us: 01679-538800 (10 am to 7pm)</small>
              </div>

              <div class="card-body">
                <p id="enroll_success"></p>
                <form id="enroll_form" action="{{ url('/enroll-for-course') }}" method="post">
                   @csrf
                   <div class="form px-4 pt-5"> 
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name"> 
                    <span class="text-danger" id="name_error"></span>

                    <input type="text" name="mobile" id="mobile" class="form-control mt-4" placeholder="Mobile">
                    <span class="text-danger" id="mobile_error"></span>

                    <select name="course" id="course" class="form-control mt-4">
                      <option value="">Select Course</option>
                      <option value="Course A">Course A</option>
                      <option value="Course B">Course B</option>
                      <option value="Course C">Course C</option>
                      <option value="Course D">Course D</option>
                    </select>
                    <span class="text-danger" id="course_error"></span>
                    
                    <button type="submit" class="btn btn-danger mt-5">Submit</button>
                   </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- content section end-->
@endsection