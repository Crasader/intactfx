<div role="tabpanel" class="tab-pane fade" id="standard">
    <div class="col-md-3">
        <div id="account-wrapper">
            <div class="account-icon">
                <img src="{{url('img/mainpage/standard-account-blue.png')}}" alt="standard account" title="standard account" />
            </div>
            <div class="account-information">
                <h3>Standard Account</h3>
                <p>
                    <a href="#" @click="accountSetSelected('standard')" class="add-account-btn" data-toggle="modal" data-target="#StandardAccountModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Account 
                    </a>
                </p>
                <p><a href="#" @click="openModal('standard')" class="red-btn">Change Trading Password</a></p>
                <p><a href="#" @click="openModal('standard')" class="green-btn">Change Investor Password</a></p>
            </div>
        </div>
    </div><!--/ col-md-3 -->

    <div class="col-md-9">
        <div class="table">
            <table class="table" border="0" cellspacing="1">
                 <tr>
                    <th class="text-center">Metatrader Account</th>
                    <th>Balance</th>
                    <th>Deposit</th>
                    <th>Withdrawal</th>
                    <th class="text-center">Social Connection</th>
                </tr>
                <tr class="table-dashboard" v-for="mt4Account in mt4AccountList.accounts"  v-if="mt4Account.account_type == 'standard'">
                    <td class="text-center">
                        <input type="radio" value="@{{ mt4Account.mt4login_id }}" v-model="intactdata.profile.radio_standard_mt4Account_id"> @{{ mt4Account.mt4login_id }}
                    </td>
                    <td>@{{ mt4Account.balance | currency }}</td>
                    <td class="green text-center">
                        <a href="#" @click="setSelected( mt4Account.mt4login_id )" data-toggle="modal" data-target="#TransferInModal">Transfer In</a>
                    </td>
                    <td class="green text-center">
                        <a href="#" @click="setSelected( mt4Account.mt4login_id )" data-toggle="modal" data-target="#TransferOutModal">Transfer Out</a>
                    </td>
                    <td class="text-center">
                        <a href="#" data-toggle="modal" data-target="#SocialmediaModal"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#SocialmediaModal"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#SocialmediaModal"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#SocialmediaModal"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div><!--/ col-md-9 -->
</div><!--/ tab panel -->