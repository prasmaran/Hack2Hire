
import pdftables_api


# API KEY VERIFICATION
conversion = pdftables_api.Client('84khvxgo3u7w')

# PDf to CSV
# (Hello.pdf, Hello)
conversion.csv('138-products.pdf', 'test.csv')


