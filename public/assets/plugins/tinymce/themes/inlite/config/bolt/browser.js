configure({
  configs: [
    './prod.js'
  ],
  sources: [
    source('amd', 'ephox/tinymce', '', mapper.constant('../../../../../tinymce')),
    source('amd', 'ephox.mcagar', '../../lib/appointment', mapper.flat),
    source('amd', 'ephox', '../../lib/appointment', mapper.flat)
  ]
});
