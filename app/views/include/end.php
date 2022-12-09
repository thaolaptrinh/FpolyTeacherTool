<script src="<?= BASE_URL('assets/plugins/global/plugins.bundle.js') ?>"></script>
<script src="<?= BASE_URL('assets/js/scripts.bundle.js') ?>"></script>



<script src="<?= BASE_URL('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') ?>"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="<?= BASE_URL('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script src="<?= BASE_URL('assets/js/custom/toast.js') ?>"></script>

<script src="<?= BASE_URL('assets/js/widgets.bundle.js') ?>"></script>



<script>
  let base_url = $("#base_url").attr("href");
  let page_target = $("#base_url").attr("page_target");

  if (page_target == 'bang-diem') {
    $('#app-container').removeClass('container-xxl');
  }
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<?php

if ($type == 'teacher') { ?>
  <script src="<?= BASE_URL('assets/js/custom/utilities/modals/create-app.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/utilities/modals/donate.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/alert-donate.js') ?>"></script>
<?php } ?>
<?php
if ($page_target == 'login') { ?>
  <script src="<?= BASE_URL('assets/js/auth/login.js') ?>"></script>
<?php } elseif ($page_target == 'register') { ?>
  <script src="<?= BASE_URL('assets/js/auth/register.js') ?>"></script>
<?php  } elseif ($page_target == 'profile') { ?>
  <script src="<?= BASE_URL('assets/js/auth/profile.js') ?>"></script>
<?php  } elseif ($page_target == 'resetpass') { ?>
  <script src="<?= BASE_URL('assets/js/auth/reset-password.js') ?>"></script>
<?php } elseif ($page_target == 'lien-ket') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/links/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/links/add.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/links/update.js') ?>"></script>
<?php } elseif ($page_target == 'thanh-ngu') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/thanhngu/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/thanhngu/add.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/extensions/thanhngu/update.js') ?>"></script>
<?php } elseif ($page_parent == 'danh-muc') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/danhmuc/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/danhmuc/add.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/danhmuc/update.js') ?>"></script>
<?php } elseif ($page_target == 'bang-diem') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/bangdiem/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/bangdiem/update.js') ?>"></script>

<?php } elseif ($page_target == 'lich') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/calendar/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/calendar/add.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/custom/app/calendar/update.js') ?>"></script>
<?php } elseif ($page_target == 'index') { ?>
  <script src="<?= BASE_URL('assets/js/custom/app/calendar/table.js') ?>"></script>
<?php } ?>
</body>

</html>