CREATE TABLE link (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  created TIMESTAMP NOT NULL DEFAULT NOW(),
  modified TIMESTAMP NOT NULL DEFAULT 0,
  reference VARCHAR(4096) NOT NULL,
  linktext VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tag (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  created TIMESTAMP NOT NULL DEFAULT NOW(),
  modified TIMESTAMP NOT NULL DEFAULT 0,
  tagname VARCHAR(50),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE link_tag (
  link_id INTEGER UNSIGNED NOT NULL,
  tag_id INTEGER UNSIGNED NOT NULL,
  created TIMESTAMP NOT NULL DEFAULT NOW(),
  FOREIGN KEY(link_id) REFERENCES link(id),
  FOREIGN KEY(tag_id) REFERENCES tag(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
