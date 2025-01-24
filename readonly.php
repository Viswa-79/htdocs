<!-- <script>
 document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.getElementById('editButton');
    const inputField = document.getElementById('myInput');

    editButton.addEventListener('click', function() {
        if (inputField.hasAttribute('readonly')) {
            inputField.removeAttribute('readonly');
            inputField.focus();
            editButton.textContent = 'Save';
        } else {
            inputField.setAttribute('readonly', 'true');
            editButton.textContent = 'Edit';
        }
    });
});
</script>
<style>
    
.container {
    margin: 20px;
}

input[readonly] {
    background-color: #f0f0f0;
    cursor: not-allowed;
}

input:not([readonly]) {
    background-color: #fff;
    cursor: text;
}

    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Input Field</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <input type="text" id="myInput" value="Edit me!" readonly>
        <button id="editButton">Edit</button>
    </div>

    <script src="script.js"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editable Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-control[readonly] {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

    <table class="table">
        <thead>
            <tr>
                <th>Expense Amount</th>
                <th>Other Expense</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            <!-- Example row, repeat this as needed -->
           <!-- HTML Table Row -->
<td style="padding: 0.3rem">
    <input 
        type="text"
        class="form-control"
        id="exp_amt<?php echo $i;?>"
        name="exp_amt[]" 
        onkeyup="tott('exp_amt<?php echo $i;?>');"
        aria-label="Expense Amount"
    />
</td>

<td style="padding: 0.3rem">
    <input 
        type="text"
        class="form-control"
        id="other_exp<?php echo $i;?>"
        name="other_exp[]"
        onkeyup="tott('exp_amt<?php echo $i;?>');"
        aria-label="Other Expenses"
    /> 
</td>

<td style="padding: 0.3rem">
    <input 
        type="text"
        class="form-control"
        id="total<?php echo $i;?>"
        name="total[]"
        style="background-color:#f5f5f5"
        onkeyup="tott('exp_amt<?php echo $i;?>');"
        aria-label="Total"
        readonly
    />                
</td>

<!-- Button to Toggle Readonly -->
<button id="editButton">Edit</button>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.getElementById('editButton');

    editButton.addEventListener('click', function() {
        const inputs = document.querySelectorAll('input.form-control');
        
        inputs.forEach(input => {
            if (input.hasAttribute('readonly')) {
                input.removeAttribute('readonly');
                input.focus();
            } else {
                input.setAttribute('readonly', 'true');
            }
        });
    });
});
</script>

        </tbody>
    </table>

    <!-- Button to toggle read-only state -->
    <button id="editButton" class="btn btn-primary">Edit</button>
    <!-- Example input to toggle read-only -->
    <input type="text" id="myInput" class="form-control" readonly />

    

</body>
</html>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.getElementById('editButton');

    editButton.addEventListener('click', function() {
        // Select all exp_amt and other_exp fields
        const expAmtInputs = document.querySelectorAll('input[id^="exp_amt"]');
        const otherExpInputs = document.querySelectorAll('input[id^="other_exp"]');

        // Toggle readonly attribute for exp_amt and other_exp fields
        expAmtInputs.forEach(input => {
            if (input.hasAttribute('readonly')) {
                input.removeAttribute('readonly');
                input.focus(); // Optional: Focus on the first editable input
            } else {
                input.setAttribute('readonly', 'true');
            }
        });

        otherExpInputs.forEach(input => {
            if (input.hasAttribute('readonly')) {
                input.removeAttribute('readonly');
            } else {
                input.setAttribute('readonly', 'true');
            }
        });
    });
});
</script>
<!-- <a  type="button"id="editButton">Edit</a> -->