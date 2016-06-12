<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ Form::open(array('url' => 'foo/bar', 'method' => 'put')) }}

                    <p class="clear text-center">
                        <span class="col-md-5">Enter Old Password:</span>
                        <span class="col-md-7">
                            <input  v-model="intactdata.profile.password" type="text" class="dark-input" name="oldpass" />
                            <span v-show="countPass<7" class="text text-danger">Minimum Character: 7</span>
                        </span>

                    </p>
                    
                    @{{ countChars }}
                    <p class="clear text-center">
                        <span class="col-md-5">Enter New Password:</span>
                        <span class="col-md-7">
                            <input v-model="intactdata.profile.new_password" type="text" class="light-input" name="newpass" />
                            <span v-show="countPassInvestor<7" class="text text-danger">Minimum Character: 7</span>
                        </span>
                    </p>
                    
                    <p class="text-center">
                        <input @click.prevent="submitChangePass" type="submit" name="submit" value="Change Password" class="modal-btn">
                    </p>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>