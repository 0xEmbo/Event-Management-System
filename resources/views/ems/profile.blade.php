<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Eventopedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}

</style>
</head>



<body>
<form method="post" action="{{ route('profile.update', $user->id) }}">
<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>
    <div class="card overflow-hidden">
            @csrf
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label class="form-label">Company</label>
                  <input type="text" class="form-control" name="company" value="{{ $user->company ?? old('company') }}">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">Comfirm new password</label>
                  <input type="password" name="password_confirmation" class="form-control">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Bio</label>
                  <textarea class="form-control" name="bio" rows="5">{{ $user->bio ?? old('bio') }}</textarea>
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="date" class="form-control" name="birthday" value="{{ $user->birthday ?? old('birthday') }}">
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" value="{{ $user->address ?? old('address') }}">
                </div>
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? old('phone') }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-right mt-3">
        <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
    </div>
  </div>
</form>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
