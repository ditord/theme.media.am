(function () {
  function getResultsData(resultsElement) {
    const rows = resultsElement.querySelectorAll('table tbody tr');
    const data = [];

    rows.forEach(function (row) {
      const cells = row.querySelectorAll('td');
      const label = cells[0] ? cells[0].textContent.trim() : '';
      const value = cells[1] ? parseFloat(cells[1].textContent.trim()) : 0;

      if (label) {
        data.push({
          label: label,
          value: Number.isFinite(value) ? value : 0,
        });
      }
    });

    return data;
  }

  function renderResults(resultsElement) {
    if (resultsElement.dataset.mediaAmPollResultsRendered === 'true') {
      return;
    }

    const data = getResultsData(resultsElement);
    if (!data.length) {
      return;
    }

    const total = data.reduce(function (sum, item) {
      return sum + item.value;
    }, 0);
    const list = document.createElement('div');

    list.className = 'media-am-poll-results';

    data.forEach(function (item) {
      const percent = total > 0 ? Math.round((item.value / total) * 100) : 0;
      const row = document.createElement('div');
      const label = document.createElement('div');
      const track = document.createElement('div');
      const fill = document.createElement('div');
      const value = document.createElement('div');

      row.className = 'media-am-poll-results__row';
      label.className = 'media-am-poll-results__label';
      track.className = 'media-am-poll-results__track';
      fill.className = 'media-am-poll-results__fill';
      value.className = 'media-am-poll-results__value';

      label.textContent = item.label;
      value.textContent = percent + '%';
      track.setAttribute('aria-label', item.label + ': ' + item.value + ' (' + percent + '%)');
      track.style.setProperty('--media-am-poll-percent', percent + 5 + '%');
      fill.style.width = percent + '%';

      track.appendChild(fill);
      track.appendChild(value);
      row.appendChild(label);
      row.appendChild(track);
      list.appendChild(row);
    });

    const scale = document.createElement('div');
    scale.className = 'media-am-poll-results__scale';

    for (let tick = 0; tick <= 100; tick += 10) {
      const scaleValue = document.createElement('span');
      scaleValue.textContent = tick;
      scale.appendChild(scaleValue);
    }

    list.appendChild(scale);

    resultsElement.classList.add('media-am-poll-results-ready');
    resultsElement.appendChild(list);
    resultsElement.dataset.mediaAmPollResultsRendered = 'true';
  }

  function renderAllResults(root) {
    root.querySelectorAll('.results-apm').forEach(renderResults);
  }

  document.addEventListener('DOMContentLoaded', function () {
    const postContent = document.getElementById('single-post-content');

    if (!postContent) {
      return;
    }

    renderAllResults(postContent);

    const observer = new MutationObserver(function () {
      renderAllResults(postContent);
    });

    observer.observe(postContent, {
      childList: true,
      subtree: true,
    });
  });
})();
