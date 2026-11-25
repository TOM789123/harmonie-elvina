"""Prépare les images de la refonte (WebP + JPEG de repli) à partir des originaux du site."""
from pathlib import Path
from PIL import Image, ImageOps, ImageEnhance
import numpy as np
SRC = Path('/home/claude/depot/assets/img')
DST = Path('/home/claude/refonte/assets/img'); DST.mkdir(parents=True, exist_ok=True)

def variantes(im, nom, largeurs, q=70, jpeg=True):
    for L in largeurs:
        v = im if im.width <= L else im.resize((L, round(im.height * L / im.width)), Image.LANCZOS)
        v.save(DST / f'{nom}-{v.width}.webp', 'WEBP', quality=q, method=6)
    if jpeg:
        L = largeurs[0]; v = im if im.width <= L else im.resize((L, round(im.height * L / im.width)), Image.LANCZOS)
        v.convert('RGB').save(DST / f'{nom}-{v.width}.jpg', 'JPEG', quality=78, optimize=True, progressive=True)
    print(nom, im.size, [f.name for f in sorted(DST.glob(nom + '-*'))])

ch = Image.open(SRC / 'chemin-foret.jpg').convert('RGB')
variantes(ch, 'chemin', [1400, 1000, 700])
ca = Image.open(SRC / 'foret-contact.jpg').convert('RGB')
variantes(ca, 'canopee', [1830, 1200, 800])
se = Image.open(SRC / 'accompagnement.jpg').convert('RGB')
variantes(se, 'sentier', [420])
tr = Image.open(SRC / 'arbre-cote.jpg').convert('RGB').crop((0, 0, 445, 1900))
variantes(tr, 'tronc', [445, 300])
po = Image.open(SRC / 'portrait-harmonie.jpg').convert('RGB').crop((30, 8, 330, 308))
variantes(po, 'portrait', [300])
an = Image.open(SRC / 'animaux.jpg').convert('RGB').crop((0, 40, 645, 420))
an = ImageEnhance.Contrast(an).enhance(1.08)
variantes(an, 'dessin-animaux', [645])
cs = Image.open(SRC / 'photo-bas-de-page.jpg').convert('RGB')
variantes(cs, 'clairiere', [460])

# Logo : blanc -> transparent (algorithme « couleur vers alpha »)
lg = np.asarray(Image.open(SRC / 'logo-harmonie-elvina.png').convert('RGB')).astype(float) / 255
alpha = 1 - lg.min(axis=2)
alpha = np.clip((alpha - 0.02) / 0.98, 0, 1)
with np.errstate(divide='ignore', invalid='ignore'):
    rgb = np.where(alpha[..., None] > 0, (lg - 1 + alpha[..., None]) / alpha[..., None], 0)
rgba = np.dstack([np.clip(rgb, 0, 1), alpha]) * 255
logo = Image.fromarray(rgba.astype('uint8'), 'RGBA')
bbox = logo.getchannel('A').point(lambda a: 255 if a > 8 else 0).getbbox()
logo = logo.crop((bbox[0] - 6, bbox[1] - 6, bbox[2] + 6, bbox[3] + 6))
logo.save(DST / 'logo-harmonie-elvina.png', optimize=True)
logo.save(DST / 'logo-harmonie-elvina.webp', 'WEBP', quality=90, method=6)
print('logo', logo.size)
ln = Image.open(SRC / 'logo-nettoyage-energetique.png').convert('RGBA')
bbox = ln.getchannel('A').point(lambda a: 255 if a > 8 else 0).getbbox(); ln = ln.crop(bbox)
ln.save(DST / 'logo-nettoyage.png', optimize=True); ln.save(DST / 'logo-nettoyage.webp', 'WEBP', quality=90, method=6)
print('logo nettoyage', ln.size)
