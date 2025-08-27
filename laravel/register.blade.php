<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Register</h2>
    <form id="registerForm">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            <span class="text-danger error-text name_err"></span>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <span class="text-danger error-text email_err"></span>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="text-danger error-text password_err"></span>
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script>
$('#registerForm').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url: '/register',
        method: 'POST',
        data: $(this).serialize(),
        success: function(res){
            if(res.errors){
                $.each(res.errors, function(key, val){
                    $('.'+key+'_err').text(val[0]);
                });
            } else {
                alert(res.success);
                window.location.href = '/dashboard';
            }
        }
    });
});
</script>
</body>
</html>
