<!-- Settings Modal -->
<div class="modal fade" id="SettingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#profilesettings" aria-controls="profilesettings" role="tab" data-toggle="tab">Profile Setting</a></li>
                    <li role="presentation"><a href="#otp" aria-controls="otp" role="tab" data-toggle="tab">OTP Setting</a></li>
                    <li role="presentation"><a href="#whatsapp" aria-controls="whatsapp" role="tab" data-toggle="tab">Whatsapp Setting</a></li>
                    <li role="presentation"><a href="#marketing" aria-controls="marketing" role="tab" data-toggle="tab">Marketing Tools</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="profilesettings">
                        <div class="col-md-6 left">
                            <div class="account-profile">
                                <div class="account-thumb">
                                    <img src="{{url('img/mainpage/account-picture.png')}}" alt="profile photo" title="profile photo" />
                                </div>
                                <div class="account-status">
                                    <h3 class="text-center">Account Status 
                                        <input v-show="intactdata.userProfile.account_stat==0" type="button" name="OPS! NOT VERIFIED" value="OPS! NOT VERIFIED" class="red-btn-profile">
                                        <input v-show="intactdata.userProfile.account_stat==1" type="button" name="OPS! NOT VERIFIED" value="VERIFIED!" class="blue-btn-profile">
                                        <input v-show="intactdata.userProfile.account_stat==2" type="button" name="OPS! NOT VERIFIED" value="IB ACCOUNT" class="green-btn-profile">
                                    </h3>
                                    <p  class="text-center">
                                        <small v-show="intactdata.userProfile.account_stat==0">Please go to Main Wallet to upload your <br />documents for verification</small>
                                        <small v-else> <br /></small>
                                    </p>
                                    <p class="text-center">
                                        <input v-show="profileForm.edit==0" @click="profileForm.edit=1" type="button" name="edit profile" value="Edit Profile" class="blue-btn"> 
                                        <input v-show="profileForm.edit==1" @click="profileUpdate()" type="button" name="save" value="SAVE" class="blue-btn">
                                    </p>
                                </div>

                                <div class="clear"></div>

                                <p>Change profile picture</p>
                                <p>
                                    <!-- <input type="file" id="profilepicture"> -->
                                    <input type="button" name="Upload" value="Upload" class="blue-btn">
                                </p>

                                <div class="financial-information">
                                    <h3 class="bold text-center">Financial Information</h3>
                                    <h3 class="text-center normal">Banking</h3>
                                    <p>
                                        <span>Account Holder Name</span>
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.bank_fullname" type="text" class="account-input" name="fullname" />
                                    </p>
                                    <p>
                                        <span>Account Number</span> 
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.bank_account" type="text" value="Bank account number or IBAN" class="account-input" name="bankaccount" />
                                    </p>
                                    <p>
                                        <span class="short">Bank Name</span>
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.bank_name" type="text"  class="account-input short" name="bankname" />
                                        <span class="short text-right">SWIFTCODE</span> 
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.bank_swiftcode" type="text" value="" class="account-input short" name="swiftcode" />
                                    </p>
                                    <p>
                                        <span class="short">Country</span>
                                        <select :disabled="profileForm.edit==0" class="select-form">
                                            <option>Country 1</option>
                                            <option>Country 2</option>
                                            <option>Country 3</option>
                                            <option>Country 4</option>
                                            <option>Country 5</option>
                                        </select>
                                        
                                        <span class="short text-right">State</span> 
                                        <select :disabled="profileForm.edit==0" class="select-form">
                                            <option>State 1</option>
                                            <option>State 2</option>
                                            <option>State 3</option>
                                            <option>State 4</option>
                                            <option>State 5</option>
                                        </select>  
                                    </p>
                                    <h3 class="text-center normal">Other payment systems</h3>
                                    <p>Select
                                        <label class="radio-inline">
                                            <input :disabled="profileForm.edit==0" v-model="profileForm.picked" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="neteller"> Neteller
                                        </label>
                                        <label class="radio-inline">
                                            <input :disabled="profileForm.edit==0" v-model="profileForm.picked" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="skrill"> Skrill
                                        </label>
                                        <label class="radio-inline">
                                            <input :disabled="profileForm.edit==0" v-model="profileForm.picked" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="pm"> Perfect Money
                                        </label>
                                    </p>
                                    <p>
                                        <span>Account ID/Email</span>
                                            <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.netteller" v-show="profileForm.picked=='neteller'" type="text" value="" class="account-input" name="accountid" />
                                            <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.skrill" v-show="profileForm.picked=='skrill'" type="text" value="" class="account-input" name="accountid" />
                                            <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.perfect_money" v-show="profileForm.picked=='pm'" type="text" value="" class="account-input" name="accountid" />
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 right">
                            <div class="general-information">
                                <h3 class="bold text-center">General Information</h3>
                                <p>
                                    <span>First Name</span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.first_name" type="text" placeholder="First Name" class="account-input" name="FirstName" />
                                </p>
                                <p>
                                    <span>Last Name</span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.last_name" type="text" placeholder="Last Name" class="account-input short" name="LastName" />
                                    <span class="short text-right">Gender</span>
                                    <select :disabled="profileForm.edit==0" class="select-form">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </p>
                                <p>
                                    <span>Date of birth</span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.birthdate" type="text" placeholder="dd/mm/yyyy" class="account-date" name="date" /> 
                                    <img src="{{url('img/mainpage/account-date-icon.png')}}" alt="date" title="date" class="date-icon" />
                                    <span class="short text-right" style="width: 67px !important;">Phone</span> 
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.phone_number" type="text" class="account-input short" name="phone" />
                                </p>
                                <p>
                                    <span>Email</span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.email" type="text" placeholder="Email" class="account-input" name="Email" />
                                </p>
                                <p>
                                    <span>Address</span>
                                    <input  :disabled="profileForm.edit==0" v-model="intactdata.userProfile.address" type="text"  class="account-input" name="Address1" />
                                </p>
                                <p>
                                    <span>&nbsp;</span>
                                    <input  :disabled="profileForm.edit==0" v-model="intactdata.userProfile.address2" type="text" class="account-input" name="Address2" />
                                </p>
                                <p>
                                    <span>City</span>
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.city" type="text" class="account-input short" name="City" />
                                    <span class="short text-right">State</span>
                                        <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.state" type="text" class="account-input short" name="State" /> 
                                </p>
                                <p>
                                    <span>Zipcode</span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.zipcode" type="text" value="" class="account-input short" name="Zipcode" />
                                    <span class="short text-right">Country</span>
                                    <select :disabled="profileForm.edit==0" class="select-form">
                                        <option>Country 1</option>
                                        <option>Country 2</option>
                                        <option>Country 3</option>
                                        <option>Country 4</option>
                                        <option>Country 5</option>
                                    </select>  
                                </p>

                                <div class="gap"></div>

                                <h3 class="text-center bold">Additional Information</h3>

                                <p>
                                    <span class="social-icon">
                                    <img src="{{url('img/mainpage/gi-skype-icon.png')}}" alt="skype" title="skype" /></span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.skype_id" type="text" placeholder="skype id" class="account-input short" name="skype" />
                                    <span class="social-icon">
                                    <img src="{{url('img/mainpage/gi-icq-icon.png')}}" alt="icq" title="icq" /></span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.icq_number" type="text" placeholder="icq number" class="account-input short" name="icq" />
                                </p>

                                <p>
                                    <span class="social-icon">
                                    <img src="{{url('img/mainpage/gi-twitter-icon.png')}}" alt="twitter" title="twitter" /></span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.twitter_username" type="text" placeholder="twitter username" class="account-input short" name="twitter" />
                                    <span class="social-icon">
                                    <img src="{{url('img/mainpage/gi-google-icon.png')}}" alt="google" title="google" /></span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.google_email" type="text" placeholder="google+ email" class="account-input short" name="google+ email" />
                                </p>

                                <p>
                                    <span class="social-icon">
                                        <img src="{{url('img/mainpage/gi-facebook-icon.png')}}" alt="facebook" title="facebook" />
                                    </span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.facebook_url" type="text" placeholder="facebook name" class="account-input short" name="facebook" />
                                    <span class="social-icon">
                                        <img src="{{url('img/mainpage/gi-pinterest-icon.png')}}" alt="pinterest" title="pinterest" />
                                    </span>
                                    <input :disabled="profileForm.edit==0" v-model="intactdata.userProfile.instagram_url" type="text" placeholder="instagram" class="account-input short" name="pinterest" />
                                </p>

                            </div>
                        </div>
                    </div>  

                    <div role="tabpanel" class="tab-pane" id="otp">
                        <div class="settings-content">

                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="whatsapp">
                        <div class="settings-content">

                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="marketing">
                        <div class="settings-content">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>