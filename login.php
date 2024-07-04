<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
			<div class="row justify-content-center">
				<img src="img/logo.svg" alt="" class="rounded mx-auto mt-5 d-block" style="width: 150px;">
			</div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Admin Login</h3>
                        <form action="proses_login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="123" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="123" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
														<button type="button" onclick="location.href='index.php'" class="btn btn-danger btn-block mt-3">Close</button>
                        </form>
												
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
