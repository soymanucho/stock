@include('client._fields')

<script>
  var inputs = document.getElementsByTagName('input');
  for (var y = 0; y < inputs.length; y++) {

          inputs[y].disabled = 'disabled';

  }

  var contact = document.getElementById('newContact');
  contact.style.visibility = "hidden";
  // var location = document.getElementById('locations');
  // location.disabled = true;
</script>
