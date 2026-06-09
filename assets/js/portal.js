(function($) {
  'use strict';

  const CamaraPortal = {
    init: function() {
      this.cacheElements();
      this.bindEvents();
      this.loadTramites();
    },

    cacheElements: function() {
      this.$document = $(document);
      this.$window = $(window);
      this.$body = $('body');
    },

    bindEvents: function() {
      this.$document.on('click', '.camara-portal-servicio-card', this.openFormService.bind(this));
      this.$document.on('click', '.camara-portal-btn-submit', this.submitForm.bind(this));
      this.$document.on('click', '.camara-portal-tramite-row', this.viewTramite.bind(this));
    },

    openFormService: function(e) {
      e.preventDefault();
      const $card = $(e.currentTarget);
      const serviceType = $card.data('service');
      console.log('Abriendo formulario para:', serviceType);
    },

    submitForm: function(e) {
      e.preventDefault();
      const formData = this.getFormData();
      this.createTramite(formData);
    },

    getFormData: function() {
      return {};
    },

    createTramite: function(data) {
      $.ajax({
        url: camaraPortal.apiUrl + 'tramites',
        type: 'POST',
        headers: {
          'X-WP-Nonce': camaraPortal.nonce,
          'Content-Type': 'application/json',
        },
        data: JSON.stringify(data),
        success: function(response) {
          console.log('Trámite creado:', response);
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        },
      });
    },

    loadTramites: function() {
      $.ajax({
        url: camaraPortal.apiUrl + 'tramites',
        type: 'GET',
        headers: {
          'X-WP-Nonce': camaraPortal.nonce,
        },
        success: function(response) {
          console.log('Trámites cargados:', response);
        },
        error: function(xhr, status, error) {
          console.error('Error al cargar trámites:', error);
        },
      });
    },

    viewTramite: function(e) {
      const tramiteId = $(e.currentTarget).data('tramite-id');
      this.loadTramiteDetail(tramiteId);
    },

    loadTramiteDetail: function(tramiteId) {
      $.ajax({
        url: camaraPortal.apiUrl + 'tramites/' + tramiteId,
        type: 'GET',
        headers: {
          'X-WP-Nonce': camaraPortal.nonce,
        },
        success: function(response) {
          console.log('Detalle del trámite:', response);
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        },
      });
    },
  };

  $(document).ready(function() {
    CamaraPortal.init();
  });

  window.CamaraPortal = CamaraPortal;
})(jQuery);
