module('admin - common');

asyncTest('init() calls events()', function () {
    this.stub(marvin_common, 'events', function () {
        ok(1, 'events() called');
        marvin_common.events.restore();
        start();
    });

    marvin_common.init();
});

asyncTest('confirm() creates confirm dialog', function() {
    this.stub(window, 'confirm', function () {
      ok(1, 'confirm dialog appeared');
      window.confirm.restore();
      start();
    });

    marvin_common.confirm({ preventDefault: function () {} });
});

asyncTest('confirm() prevents default if cancel is clicked', function() {
    var e = {
        preventDefault: function () {
            ok(1, 'prevents default behavior');
            start();
        }
    };

    this.stub(window, 'confirm', function () {
      ok(1, 'confirm dialog appeared');
      return false;
    });

    marvin_common.confirm(e);
});
