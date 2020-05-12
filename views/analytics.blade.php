<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $trackingId }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ $trackingId }}');
  @foreach($secondaryTrackingIds as $id)
    gtag('config', '{{ $id }}');
  @endforeach
</script>
