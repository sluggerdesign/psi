// Form Validation
$(document).ready(function(){
   $.validator.addMethod("phone", function(phone_number, element) {
      return this.optional(element) || /\(?\d{3}\W?\s?\d{3}\W?\d{4}/.test(phone_number);
    }, "Valid Phone Required.");

   jQuery.validator.addMethod("placeholder", function(value, element) {
      return value!=$(element).attr("placeholder");
    }, jQuery.validator.messages.required);

   $('#create-branch').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-branch').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#create-task').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-task').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#create-crew').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-crew').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#create-user').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      },
      email: {
        email: true,
        required: true
      },
      password: {
        minlength: 6,
        required: true
      }
    },
    messages: {
			password: {
				minlength: 'Enter at least 6 characters (letters and numbers)'
			}
		},
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-user').validate(
   {
    rules: {
      name: {
        minlength: 5,
        required: true
      },
      email: {
        email: true,
        required: true
      },
      password: {
        minlength: 6,
        required: true
      }
    },
    messages: {
			password: {
				minlength: 'Enter at least 6 characters (letters and numbers)'
			}
		},
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#create-job').validate(
   {
    rules: {
      name: {
        minlength: 3,
        required: true
      },
      number: {
        required: true
      },
      branch: {
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-job').validate(
   {
    rules: {
      name: {
        minlength: 3,
        required: true
      },
      number: {
        required: true
      },
      branch: {
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#create-work').validate(
   {
    rules: {
      task: {
        required: true
      },
      addcrew: {
        required: true
      },
      start: {
        required: true
      },
      end: {
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });

   $('#edit-work').validate(
   {
    rules: {
      task: {
        required: true
      },
      addcrew: {
        required: true
      },
      start: {
        required: true
      },
      end: {
        required: true
      }
    },
    highlight: function(label) {
      $(label).closest('.columns').addClass('error');
    }
   });
});
