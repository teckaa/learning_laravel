        // get the country data from the plugin
        var countryData = window.intlTelInputGlobals.getCountryData(),
        inputPhone = document.querySelector("#phone"),
        addressDropdown = document.querySelector("#address-country");

      // initialise plugin
      var iti = window.intlTelInput(inputPhone, {
          initialCountry: "auto",
          hiddenInput: "phonenumber",
          geoIpLookup: function(callback) {
              $.get('https://ipinfo.io', function() {}, "jsonp").always(
                  function(resp) {
                      var countryCode = (resp && resp.country) ? resp
                          .country : "";
                      callback(countryCode);
                  });
          },
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js?1590403638580" // just for formatting/placeholders etc
      });


        // populate the country dropdown
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdown.appendChild(optionNode);
        }
        // set it's initial value
        addressDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        inputPhone.addEventListener('countrychange', function(e) {
        addressDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdown.addEventListener('change', function() {
            iti.setCountry(this.value);
        });