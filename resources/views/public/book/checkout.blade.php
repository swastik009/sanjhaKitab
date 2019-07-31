@extends('public.master')

@section('title','Checkout | Sanjha Kitab')

@section('content')
    <body class="d-flex flex-column">
    <div id="page-content">

        <div class="container g-pt-100 g-pb-70">
            <h1 class="display-2 g-color-primary">Final Confirmation</h1>
         <hr>


            <form action="{{ route('ConfirmCheckOut') }}" method="POST">
                @csrf
                <div id="stepFormSteps">
                    <!-- Shopping Cart -->
                    <div id="step1" class="active">
                        <div class="row">
                            <div class="col-md-8 g-mb-30">
                                <!-- Products Block -->
                                <div class="g-overflow-x-scroll g-overflow-x-visible--lg">
                                    <table class="text-center w-100">
                                        <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-black text-uppercase">
                                        <tr>
                                            <th class="g-font-weight-400 text-left g-pb-20">Product</th>
                                            <th class="g-font-weight-400 g-width-130 g-pb-20">Price</th>
                                            <th class="g-font-weight-400 g-width-50 g-pb-20">Qty</th>


                                        </tr>
                                        </thead>

                                        <tbody id="ItemBody">
                                        <!-- Item-->

                                        @foreach($userBooks as $userbook)

                                        <tr class="g-brd-bottom g-brd-gray-light-v3">

                                            <td class="text-left g-py-25">

                                                <img class="d-inline-block g-width-70    mr-4" src="{{asset('img/'.$userbook->image)}}" alt="Image Description">
                                                <div class="d-inline-block align-middle">
                                                    <h4 class="h6 g-color-black">{{$userbook->name}}</h4>
                                                    <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
                                                        <li>Release Date: {{\Carbon\Carbon::parse($userbook->release_date)->format('M d, Y')}}</li>
                                                        <li>Description : {{$userbook->description}}</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="g-color-gray-dark-v2 g-font-size-13">

                                                <span class="u-label g-rounded-20 g-bg-darkpurple g-px-15 g-mr-10 g-mb-15">
                                                    <i class="fa fa-heart g-mr-3"></i>
                                                    Free


                                                </span>
                                            </td>
                                            <td class="g-color-gray-dark-v2 g-font-size-13">
                                                <span class="u-label g-rounded-20 g-px-15 g-bg-primary g-mr-10 g-mb-15">1</span>

                                            </td>

                                            <td class="g-color-gray-dark-v2 g-font-size-13">
                                                <span class="u-label g-bg-red g-mr-10 g-mb-15"> <span  data-id="{{$userbook->user_books_id}}" class=" DeleteFromCheckOut g-color-white-dark-v4 g-color-yellow--hover g-cursor-pointer"> <i class="mt-auto fa fa-trash"></i></span></span>
                                            </td>
                                        </tr>
                                           <!-- End Item-->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Products Block -->

                                @section('scripts')
                                <script>

                                    $('.DeleteFromCheckOut').click(function(){
                                        // console.log('here clicked');
                                        var id = $(this).data('id');
                                        console.log(id);
                                        swal({
                                            title: "Are you sure you want to delete ?",
                                            text: "Your cart item will be deleted",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#1FAB45",
                                            confirmButtonText: "Okay",
                                            cancelButtonText: "Cancel",
                                            buttonsStyling: true,
                                            //closeOnConfirm: false
                                        }).then(function(){
                                            $.ajax({
                                                url: '/books/delete/'+id,
                                                data: {"_token": "{{ csrf_token()}}","id":id},

                                                method: 'DELETE',
                                                dataType: 'json',
                                                success: function(response) {
                                                    console.log(response);
                                                    swal(
                                                        "Item has been sucessfully delete"
                                                    );
                                                    $('#count').load(' #count');
                                                    $('.CartItems').load(' .CartItems');
                                                    $('#ItemBody').load(' #ItemBody');
                                                    $('#ItemBody').hide();
                                                    $('#ItemBody').fadeIn(5000);
                                                },
                                                failure: function (response) {
                                                    swal(
                                                        "Internal Error",
                                                        "Oops, your item was not deleted.", // had a missing comma
                                                        "error"
                                                    )
                                                },

                                                error: function(xhr){
                                                    alert(xhr.responseText);
                                                }

                                            });


                                        });
                                    });

                                </script>
                                @endsection
                            </div>

                            <div class="col-md-4 g-mb-30">


                                <!-- Summary -->
                                <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">

                                <button class="btn btn-block u-btn-outline-black g-brd-gray-light-v1 g-bg-black--hover g-font-size-13 text-uppercase g-py-15 mb-4" href="/books" type="button">Update Shopping Cart</button>



                                        <button class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4" type="submit" >
                                            Proceed to Checkout</button>



                                <!-- End Accordion -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
                    <!-- End Shopping Cart -->

                    <!-- Shipping -->
                    <div id="step2">



                        <div class="row">
                            <div class="col-md-8">
                            <h2 class="display-4 g-color-primary">Your shipping details</h2>



                            <div class="g-mb-30">
                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">First Name</label>
                                            <input id="inputGroup4" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="firstName" type="text" placeholder="Alexander" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Last Name</label>
                                            <input id="inputGroup5" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="lastName" type="text" placeholder="Teseira" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Email Address</label>
                                            <input id="inputGroup6" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="email" type="email" placeholder="alex@gmail.com" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Company</label>
                                            <input id="inputGroup7" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="company" type="text" placeholder="Pixeel Ltd.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">State/Province</label>
                                            <input id="inputGroup8" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="stateProvince" type="text" placeholder="London" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Zip/Postal Code</label>
                                            <input id="inputGroup9" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="zip" type="text" placeholder="AB123" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Country</label>
                                            <select class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12" style="width: 100%;" data-placeholder="Choose your Country" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                                <option></option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Réunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">Phone Number</label>
                                            <input id="inputGroup10" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="phoneNumber" type="text" placeholder="+01 (00) 555 666 77" required data-msg="This field is mandatory" data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                                        </div>
                                    </div>
                                </div>

                                <hr class="g-mb-50">
                            <div class="col-md-4 g-mb-30">
                                <!-- End Order Summary -->
                            </div>
                        </div>
                    </div>
                    <!-- End Shipping -->


                    </div>
                    </div>



@endsection