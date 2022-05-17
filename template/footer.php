      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script  src="assets/js/lightbox-plus-jquery.min.js"></script>


    <script>
      window.onload = (event) => {
        let myAlert = document.querySelector(".toast");
        let bsAlert = new bootstrap.Toast(myAlert);
        bsAlert.show();
      };
    </script>

</body>
</html>