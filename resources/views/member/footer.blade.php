  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-2024</strong> All rights reserved to CEO Reynard Cayetano.
  </footer>
</div>

<script>

  function copyReferralLink() {
        /* Logic to copy the referral link to the clipboard goes here */
        var referralLink = document.getElementById('referralLink');
        referralLink.select();
        document.execCommand('copy');
        alert('Referral link copied to clipboard!');
  }

</script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>