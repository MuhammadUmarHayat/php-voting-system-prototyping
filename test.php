<form>
    <label>First Option:</label>
    <input type="radio" name="first_option" value="option1" onclick="updateSecondOptions(this.value)">Option 1
    <input type="radio" name="first_option" value="option2" onclick="updateSecondOptions(this.value)">Option 2
    <br><br>
    <label>Second Option:</label>
    <input type="radio" name="second_option" value="option1">Option 1
    <input type="radio" name="second_option" value="option2">Option 2
</form>

<script>
function updateSecondOptions(value) {
    if (value == "option1") {
        document.getElementsByName("second_option")[0].checked = true;
    } else if (value == "option2") {
        document.getElementsByName("second_option")[1].checked = true;
    }
}
</script>