<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Complete HTML Form</h2>
        <form id="fullForm">
            @csrf
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
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
                <span class="text-danger error-text phone_err"></span>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
                <span class="text-danger error-text address_err"></span>
            </div>
            <div class="mb-3">
                <label>Gender</label><br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <span class="text-danger error-text gender_err"></span>
            </div>
            <div class="mb-3">
                <label>Hobbies</label><br>
                <input type="checkbox" name="hobbies[]" value="Reading"> Reading
                <input type="checkbox" name="hobbies[]" value="Sports"> Sports
                <input type="checkbox" name="hobbies[]" value="Music"> Music
                <span class="text-danger error-text hobbies_err"></span>
            </div>
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control">
                <span class="text-danger error-text dob_err"></span>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger error-text password_err"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        $('#fullForm').on('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            $('.error-text').text('');

            // Normal jQuery validation
            let valid = true;
            if (!$('input[name="name"]').val()) {
                valid = false;
                $('.name_err').text('Name is required');
            }
            if (!$('input[name="email"]').val()) {
                valid = false;
                $('.email_err').text('Email is required');
            }
            if (!$('input[name="phone"]').val()) {
                valid = false;
                $('.phone_err').text('Phone is required');
            }
            if (!$('textarea[name="address"]').val()) {
                valid = false;
                $('.address_err').text('Address is required');
            }
            if (!$('input[name="gender"]:checked').val()) {
                valid = false;
                $('.gender_err').text('Gender is required');
            }
            if ($('input[name="hobbies[]"]:checked').length == 0) {
                valid = false;
                $('.hobbies_err').text('Select at least one hobby');
            }
            if (!$('input[name="dob"]').val()) {
                valid = false;
                $('.dob_err').text('Date of birth is required');
            }
            if (!$('input[name="password"]').val()) {
                valid = false;
                $('.password_err').text('Password is required');
            }

            if (!valid) return;

            // AJAX submit
            $.ajax({
                url: '/form-submit',
                type: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    if (res.errors) {
                        $.each(res.errors, function(key, val) {
                            $('.' + key + '_err').text(val[0]);
                        });
                    } else {
                        alert(res.success);
                        $('#fullForm')[0].reset();
                    }
                }
            });
        });
    </script>
</body>

</html>
