<!DOCTYPE html>
<html lang="en">
  <head>
    <% base_tag %>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico" sizes="any" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" type="image/svg+xml" href="" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    $MetaTags
  <title><% if $ClassName.ShortName == 'HomePage' %>$SiteConfig.Title<% else %><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &vert; $SiteConfig.Title<% end_if %></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico" sizes="any" />
    <% require themedCSS("index") %>
    <% require themedCSS("new") %>
  </head>
  <script
    async
    src="https://www.googletagmanager.com/gtag/js?id=G-5LNB2XWKWQ"
  ></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-5LNB2XWKWQ");
  </script>
  <body>
    <div class="page-wrapper">
      <% include Nav %>
      <div class="container content">
      $Layout
      </div>
      <% include Footer %>
      <% require javascript('//code.jquery.com/jquery-3.7.1.min.js') %>
      <% require themedJavascript('script') %>
    </div>
  </body>
</html>
