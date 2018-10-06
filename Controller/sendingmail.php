  message = '''<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                  <title>Phixer Notification</title>
                  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
                </head>
                <body>
                <table cellpadding="0" border="0" width="600" style="background:#ffffff; border:1px solid #E6E9ED; font-family: 'Open Sans', sans-serif; padding:20px;">
                  <tr>
                    <td valign="middle">
                      <table cellpadding="0" border="0" width="100%" style="background:#ffffff; border-collapse:collapse;">
                        <tr>
                          <td valign="middle">
                            <img src="https://d2vkfgxl432jdv.cloudfront.net/assets/images/phixer-gray.png" alt="" style="width:200px;"/>
                          </td>
                          <td valign="bottom" style="text-align:right;">
                            <p style="font-size:14px; padding:0; margin:0;">'''+ day +'''</p>
                            <p style="font-size:12px; padding:0; margin:0;">'''+ date +'''</p>
                          </td>
                        </tr>
                      </table>
                      <table cellpadding="0" border="0" width="100%" style="background:#477dfd; border-collapse:collapse; margin-top: 50px;">
                        <tr>
                          <td valign="middle" style="padding:25px 0px; text-align:center;">
                            <h3 style="padding:0; margin:0; font-weight:normal; font-size:26px; color:#fefefe;">Good day.</h3>
                          </td>
                        </tr>
                      </table>
                      <table cellpadding="0" border="0" width="100%" style="background:#F5F7FA; border-collapse:collapse;">
                        <tr>
                          <td valign="middle" style="padding:40px 0px; text-align:center;">
                            <h4 style="font-size: 18px; padding:0 60px; margin:0; font-weight:normal; color:#0e0e0e;">'''+ main_message +'''</h4>
                          </td>
                        </tr>'''
  if attachment:
    message += '''<tr>
              <td valign="middle" style="padding:10px 30px; text-align:left;">
                <b>Attached Files:</b>
              </td>
          </tr>'''
    for item in attachment:
      message += '''<tr>
                              <td valign="middle" style="padding:10px 30px; text-align:left;">
                                * <a href="'''+item.src+'''">'''+item.name+'''</a>
                              </td>
                            </tr>
                        </table>

                      </td>
                    </tr>
                  </table>
                  </body>
                  </html>'''