<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Example with Time Calculation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .modal-lg {
            max-width: 80%;
        }
    </style>
</head>
<body>
    <!-- Button to trigger modal -->
    <div class="container mt-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser">
            Open Modal
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Claim Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="post">
                        <!-- Form fields -->
                        <div class="mb-3">
                            <label for="staff" class="form-label">Staff Name</label>
                            <input type="text" id="staff" name="staff" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="from_time" class="form-label">From Time</label>
                            <input type="time" id="from_time" name="from_time" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="to_time" class="form-label">To Time</label>
                            <input type="time" id="to_time" name="to_time" class="form-control" onchange="calculateDuration()">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" id="duration" name="duration" class="form-control" readonly>
                        </div>
                        <!-- Submit and Cancel buttons -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick="handleSubmit(event)">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function calculateDuration() {
            let fromTime = document.getElementById("from_time").value;
            let toTime = document.getElementById("to_time").value;

            if (fromTime && toTime) {
                let from = new Date("1970-01-01T" + fromTime + "Z");
                let to = new Date("1970-01-01T" + toTime + "Z");
                let duration = (to - from) / 1000 / 60 / 60; // in hours
                document.getElementById("duration").value = duration.toFixed(2) + " Hrs";
            }
        }

        function handleSubmit(event) {
            event.preventDefault(); // Prevent form submission for demonstration purposes

            Swal.fire({
                title: 'Success!',
                text: 'Your data has been submitted.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>
</html>
