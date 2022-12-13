<script src="<?= BASE('assets/plugins/global/plugins.bundle.js') ?>"></script>
<script src="<?= BASE('assets/js/scripts.bundle.js') ?>"></script>


<script src="<?= BASE('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') ?>"></script>
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
<script src="<?= BASE('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script src="<?= BASE('assets/js/custom/toast.js') ?>"></script>

<script src="<?= BASE('assets/js/widgets.bundle.js') ?>"></script>


<script>
  let base_url = $("#base_url").attr("href");
  let page_target = $("#base_url").attr("page_target");
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<?php if ($page_target == 'index') { ?>
  <script src="<?= BASE_URL('assets/js/index.js') ?>"></script>
<?php } elseif ($page_target == 'teachers') { ?>
  <script src="<?= BASE_URL('assets/js/teacher/table.js') ?>"></script>

<?php } elseif ($page_target == 'co_so') { ?>
  <script src="<?= BASE_URL('assets/js/coso/table.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/coso/add.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/coso/update.js') ?>"></script>

<?php } elseif ($page_target == 'site') { ?>
  <script src="<?= BASE_URL('assets/js/index.js') ?>"></script>
  <script src="<?= BASE_URL('assets/js/site/site.js') ?>"></script>

<?php } ?>


</body>

</html>