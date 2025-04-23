require 'net/smtp'

from = 'you@example.com'         # Replace with your email
to = 'recipient@example.com'     # Replace with the recipient email
subject = 'Test Email from Ruby'
body = "Hello,\n\nThis is a test email sent using Ruby and Net::SMTP on Ubuntu.\n\nBest regards,\nRuby Script"

message = <<~END_OF_MESSAGE
  From: Ruby Mailer <#{from}>
  To: Recipient <#{to}>
  Subject: #{subject}

  #{body}
END_OF_MESSAGE

begin
  Net::SMTP.start('localhost') do |smtp|
    smtp.send_message message, from, to
  end
  puts "✅ Email sent successfully to #{to}"
rescue => e
  puts "❌ Failed to send email: #{e.message}"
end
