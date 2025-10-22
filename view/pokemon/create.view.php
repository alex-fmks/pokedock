<?php
function department_create_view(array $data = []): string
{
    return "
    <form action='' method='post'>
  <label>Name:
    <input type='text' name='name' value=''>
  </label><br>
  <label>Caught
    <input type='text' name='caught' value=''>
  </label><br>
  <input type='submit'>
</form>
    ";
}