(function($) {
  'use strict';

  var Paginator = function() {
    return {
      // Attributes
      obj: null,
      options: null,
      nav: null,

      // Methods
      build: function(obj, opts) {
        this.obj = obj;
        this.options = opts;

        if(!this.options.optional || this._totalRows() > this.options.limit) {
          this._createNavigation();
          this._setPage();
        }

        if(this.options.onCreate) this.options.onCreate(obj);

        return this.obj;
      },

      _createNavigation: function() {
        this._createNavigationWrapper();
        this._createNavigationButtons();
        this._appendNavigation();
        this._addNavigationCallbacks();
      },
      _createNavigationWrapper: function() {
        this.nav = $('<div>', {
          class: this.options.navigationClass
        });
      },
      _createNavigationButtons: function() {
        // Add 'first' button
        if(this.options.first) {
          this._createNavigationButton(this.options.firstText, {
            'data-first': true
          });
        }

        // Add 'previous' button
        if(this.options.previous) {
          this._createNavigationButton(this.options.previousText, {
            'data-direction': -1,
            'data-previous': true
          });
        }

        // Add page buttons
        for(var i = 0; i < this._totalPages(); ++i) {
 