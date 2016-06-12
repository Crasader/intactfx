
<div role="tabpanel" class="tab-pane fade in active" id="miniaccount">
    <div class="col-md-3">
        <div id="account-wrapper">

            <div class="account-icon">
                <img src="{{url('img/mainpage/mini-account-blue.png')}}" alt="mini account" title="mini account" />
            </div>

            <div class="account-information">
                <h3>Mini Account</h3>
                <p>
                    <a href="#" class="add-account-btn" data-toggle="modal" data-target="#miniAccountModal">
                        <i class="fa fa-plus" aria-hidden="true"></i> 
                        Add Account 
                    </a>
                </p>
                <p>
                    <a href="#" data-toggle="modal" data-target="#changePassModal" class="red-btn">Change Trading Password</a>
                </p>
                <p>
                    <a href="#" class="green-btn">Change Investor Password</a>
                </p>
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
            <tr class="table-dashboard" v-for="miniAccount in intactdata.mt4AccountList.mini">
                <td class="text-center">
                    <input type="checkbox" value="#14700" id="accountid" name="account" /> @{{ miniAccount.mt4login_id }}
                </td>
                <td>@{{ miniAccount.balance | currency }}</td>
                <td class="green text-center">
                    <a href="#" @click="setSelected( miniAccount.mt4login_id )" data-toggle="modal" data-target="#TransferInModal">Transfer In</a>
                </td>
                <td class="green text-center">
                    <a href="#" @click="setSelected( miniAccount.mt4login_id )" data-toggle="modal" data-target="#TransferOutModal">Transfer Out</a>
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