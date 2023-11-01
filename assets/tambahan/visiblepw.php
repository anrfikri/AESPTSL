<tr>
  <td>Masukkan Password File Untuk Mendekripsi</td>
  <td></td>
  <td>
    <div class="col-md-6">
      <input type="hidden" name="fileid" value="<?php echo $data2['id_file'];?>">
      <div class="input-group">
        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required>
        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
          <i class="fa fa-eye-slash" aria-hidden="true"></i>
        </button>
      </div>
      <br>
      <input type="submit" name="decrypt_now" value="Dekripsi File" class="form-control btn bg-gradient-info">
    </div>
  </td>
</tr>
<script>
  const togglePassword = document.querySelector("#togglePassword");
  const inputPassword = document.querySelector("#inputPassword");

  togglePassword.addEventListener("click", function () {
    const type = inputPassword.getAttribute("type") === "password" ? "text" : "password";
    inputPassword.setAttribute("type", type);

    const icon = type === "password" ? "fa-eye-slash" : "fa-eye";
    togglePassword.innerHTML = `<i class="fa ${icon}" aria-hidden="true"></i>`;
  });
</script>
