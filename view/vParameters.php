<form class="form-horizontal" method="Post" role="form">
    <div class="form-group">
        <div class="col-sm-offset-1">
            <h2>Parameters</h2>
        </div>
    </div>
    <div class="form-group">
        <label for="newUsername" class="col-sm-4 control-label">Username</label>
        <div class="col-sm-6">
            <input type="text" name="newUserName" value="<?php echo $username ?>" class="form-control" id="newUsername" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <label for="newMail" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" value="<?php echo $userMail ?>" name="newMail" id="newMail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="newPassword" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-6">
            <button type="submit" name="submitRegister" id="submitRegister" class="btn btn-default">Save</button>
        </div>
    </div>
</form>